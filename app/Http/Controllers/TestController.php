<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TestController extends Controller
{
    

    private function leaveRequestForSingle($params, $image)
    {
        $url = 'http://192.168.1.108/hrms/api/v1/leave-request';

        // Prepare the multipart data
        $data = [
            'user_id' => $params['user_id'],
            'leave_type_id' => $params['leave_type_id'],
            'date' => $params['date'],
            'duration' => $params['duration'],
            'remark' => $params['remark'],
            'auth_token' => 'da2f72577657024396ef9b6c5a06ccb7c025bdf6',
        ];

        // Start building the request using multipart
        $request = Http::attach('attachments', file_get_contents($image->getRealPath()), $image->getClientOriginalName())
            ->post($url, $data);
        return $request->json();
    }
    private function leaveRequestForMultiple($params, $images)
    {
        $url = 'http://192.168.1.108/hrms/api/v1/leave-request';

        // Prepare the data structure
        $data = [
            'user_id' => $params['user_id'],
            'leave_type_id' => $params['leave_type_id'],
            'date' => $params['date'],
            'duration' => $params['duration'],
            'remark' => $params['remark'],
            'auth_token' => 'da2f72577657024396ef9b6c5a06ccb7c025bdf6',
            'attachments' => [], // Prepare an array for attachments
        ];

        // Process images
        if (is_array($images)) {
            foreach ($images as $image) {
                if ($image instanceof \Illuminate\Http\UploadedFile) {
                    // Add attachment with the required 'contents' key
                    $data['attachments'][] = [
                        'filename' => $image->getClientOriginalName(),
                        'contents' => base64_encode(file_get_contents($image->getRealPath())),
                    ];
                } else {
                    return response()->json(['error' => 'Invalid file upload'], 400);
                }
            }
        } else {
            return response()->json(['error' => 'Invalid file upload format'], 400);
        }

        // Make the post request with the data as JSON
        $response = Http::post($url, $data);

        return $response->json(); // Return the response as JSON
    }

    public function uploadAttachment(Request $request)
    {
        $params = [
            'user_id' => 1598,
            'leave_type_id' => 1,
            'date' => '2024-10-30',
            'duration' => 1,
            'remark' => 'Attachment uploaded',
        ];

        // Get the uploaded file
        $attachments = $request->file('attachments');

        // Call the leaveRequest method with the params and the file object
        $hit_api_response = $this->leaveRequestForMultiple($params, $attachments);

        // Return the response
        return response()->json(['apiResponse' => $hit_api_response]);
    }
}
