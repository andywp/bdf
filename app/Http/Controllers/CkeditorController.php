<?php

namespace App\Http\Controllers;

use UniSharp\LaravelFilemanager\Controllers\LfmController;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use UniSharp\LaravelFilemanager\Lfm;

class CkeditorController extends LfmController
{
    protected $errors;

    public function __construct()
    {
        parent::__construct();
        $this->errors = [];
    }


    /**
     * Upload files
     *
     * @param void
     *
     * @return JsonResponse
     */
    public function upload()
    {
        $uploaded_files = request()->file('upload');
        $error_bag = [];
        $new_filename = null;

        foreach (is_array($uploaded_files) ? $uploaded_files : [$uploaded_files] as $file) {
            try {
                $this->lfm->validateUploadedFile($file);

                $new_filename = $this->lfm->upload($file);
            } catch (\Exception $e) {
                Log::error($e->getMessage(), [
                    'file' => $e->getFile(),
                    'line' => $e->getLine(),
                    'trace' => $e->getTraceAsString()
                ]);
                array_push($error_bag, $e->getMessage());
            }
        }

        if (is_array($uploaded_files)) {
            $response = count($error_bag) > 0 ? $error_bag : parent::$success_response;
        } else { // upload via ckeditor5 expects json responses
            if (is_null($new_filename)) {
                $response = [
                    'error' => [ 'message' =>  $error_bag[0] ]
                ];
            } else {
                $url = $this->lfm->setName($new_filename)->url();

                $response = [
                    'fileName' => $new_filename,
                    'uploaded' => 1,
                    'url' => $url
                ];
            exit("<html><body><script type='text/javascript'>
                var par = window.parent,
                    op = window.opener,
                    o = (par && par.CKEDITOR) ? par : ((op && op.CKEDITOR) ? op : false);
                if (o !== false) {
                    if (op) window.close();
                    o.CKEDITOR.tools.callFunction(1, '{$url}', '');
                } else {
                    alert('');
                    if (op) window.close();
                }
                </script>"); 

               // return json_encode($response);

            }
        }

        return response()->json($response);
    }
}
