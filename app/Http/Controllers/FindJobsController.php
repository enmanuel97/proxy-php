<?php

namespace App\Http\Controllers;
use Goutte\Client;
use Illuminate\Http\Request;

class FindJobsController extends Controller
{
    public function getJobs(): \Illuminate\Http\JsonResponse
    {
        try {
            $client = new Client();
            $crawler = $client->request('GET', 'https://emplea.do/');
            $jobs = $crawler->filter('.job-new-list')->each(function ($node) {
                return [
                    'title' => $node->filter('.title a')->text(),
                    'company' => $node->filter('p')->text(),
                    'type' => ($node->filter('.badge-primary')->count() > 0) ? $node->filter('.badge-primary')->text() : '',
                    'form' => ($node->filter('.badge-warning')->count() > 0) ? $node->filter('.badge-warning')->text() : '',
                    // 'img' => $node->filter('.img-fluid')->text(),
                ];
            });
            return response()->json($jobs);

        } catch (\Exception $e) {
            return response()->json([
                'status'    => 500,
                'message'   => $e->getMessage(),
                'error'     => true,
            ]);
        }
    }
}
