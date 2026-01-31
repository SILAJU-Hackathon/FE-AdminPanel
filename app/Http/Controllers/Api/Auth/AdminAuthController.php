<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class AdminAuthController extends Controller
{
    /**
     * External API base URL
     */
    private string $apiBaseUrl = 'https://xryz-test-silaju.hf.space';

    /**
     * Login admin via external API
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        try {
            // Call external API for login
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])
                ->timeout(30)
                ->post("{$this->apiBaseUrl}/api/auth/admin/login", [
                    'email' => $credentials['email'],
                    'password' => $credentials['password'],
                ]);

            if ($response->successful()) {
                $data = $response->json();

                // Inspect response structure
                $token = $data['token'] ?? $data['data']['token'] ?? null;
                // If user data is not present, mock it or use minimal info
                $user = $data['data'] ?? $data['user'] ?? ['email' => $credentials['email'], 'role' => 'admin'];

                if ($token) {
                    // Store user data and token in session
                    Session::put('api_token', $token);
                    Session::put('api_user', $user);
                    Session::put('is_authenticated', true);

                    // Regenerate session for security
                    $request->session()->regenerate();

                    return response()->json([
                        'message' => 'Login successful',
                        'user' => $user,
                        'redirect' => url('/dashboard'),
                    ]);
                }
            }

            // Handle error response from API
            $errorData = $response->json();
            $errorMessage = $errorData['message'] ?? 'Email atau password salah.';

            throw ValidationException::withMessages([
                'email' => [$errorMessage],
            ]);

        } catch (ValidationException $e) {
            throw $e;
        } catch (\Exception $e) {
            throw ValidationException::withMessages([
                'email' => ['Gagal terhubung ke server. Silakan coba lagi. ' . $e->getMessage()],
            ]);
        }
    }

    /**
     * Logout admin
     */
    public function logout(Request $request)
    {
        // Clear all session data
        Session::forget('api_token');
        Session::forget('api_user');
        Session::forget('is_authenticated');

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    /**
     * Get current authenticated user from session
     */
    public function user(Request $request)
    {
        $user = Session::get('api_user');

        if (!$user) {
            return response()->json([
                'message' => 'Unauthenticated'
            ], 401);
        }

        return response()->json([
            'user' => $user
        ]);
    }
}