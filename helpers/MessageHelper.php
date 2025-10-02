<?php
// Message Helper for success and error messages
class MessageHelper {

    /**
     * Set a success message in session
     */
    public static function setSuccess($message) {
        $_SESSION['success'] = $message;
    }

    /**
     * Set an error message in session
     */
    public static function setError($message) {
        $_SESSION['error'] = $message;
    }

    /**
     * Display and clear success/error messages
     */
    public static function displayMessages() {
        $output = '';

        if (isset($_SESSION['success'])) {
            $output .= '<div class="alert alert-success alert-dismissible fade show" role="alert">
                          <i class="fas fa-check-circle me-2"></i>' . htmlspecialchars($_SESSION['success']) . '
                          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>';
            unset($_SESSION['success']);
        }

        if (isset($_SESSION['error'])) {
            $output .= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <i class="fas fa-exclamation-triangle me-2"></i>' . htmlspecialchars($_SESSION['error']) . '
                          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>';
            unset($_SESSION['error']);
        }

        return $output;
    }

    /**
     * Check if there are any messages
     */
    public static function hasMessages() {
        return isset($_SESSION['success']) || isset($_SESSION['error']);
    }

    /**
     * Clear all messages
     */
    public static function clearMessages() {
        unset($_SESSION['success']);
        unset($_SESSION['error']);
    }
}