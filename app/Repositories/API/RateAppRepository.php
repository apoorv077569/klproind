<?php

namespace App\Repositories\API;

use App\Exceptions\ExceptionHandler;
use App\Mail\ContactUs as MailContactUs;
use App\Models\RateApp;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Prettus\Repository\Eloquent\BaseRepository;

class RateAppRepository extends BaseRepository
{
    public function model()
    {
        return RateApp::class;
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $rateApp = $this->model->create([
                'rating' => $request->rating,
                'description' => $request->description,
                'name' => $request->name,
                'email' => $request->email,
                'error_type' => $request->error_type,
                'consumer_id' => Auth::user()->id,
            ]);

            DB::commit();

            try {
                Mail::to(env('MAIL_FROM_ADDRESS'))->send(new MailContactUs($request));
            } catch (Exception $e) {
                // Log the error or handle it silently so the API response isn't affected
                // Use a logger if available, e.g., Log::error($e->getMessage());
            }

            return response()->json([
                'message' => __('static.rate_app.details_stored'),
                'success' => true,
                'data' => $rateApp,
            ], 200);

        } catch (Exception $e) {
            DB::rollback();
            throw new ExceptionHandler($e->getMessage(), $e->getCode());
        }
    }
}
