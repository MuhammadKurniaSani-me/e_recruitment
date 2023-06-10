<?php

namespace App\Controllers;

use App\Models\JobsModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Jobs extends BaseController
{
    public function index()
    {
        $model = model(JobsModel::class);

        $data = [
            'jobs'  => $model->getJobs(),
            'title' => 'Jobs archive',
        ];

        return view('templates/header', $data)
            . view('jobs/index')
            . view('templates/footer');
    }

    public function view($slug = null)
    {
        $model = model(JobsModel::class);

        $data['jobs'] = $model->getjobs($slug);

        if (empty($data['jobs'])) {
            throw new PageNotFoundException('Cannot find the jobs item: ' . $slug);
        }

        $data['title'] = $data['jobs']['title'];

        return view('templates/header', $data)
            . view('jobs/view')
            . view('templates/footer');
    }

    public function create()
    {
        helper('form');

        // Checks whether the form is submitted.
        if (! $this->request->is('post')) {
            // The form is not submitted, so returns the form.
            return view('templates/header', ['title' => 'Create a jobs item'])
                . view('jobs/create')
                . view('templates/footer');
        }

        $post = $this->request->getPost(['title', 'body']);

        // Checks whether the submitted data passed the validation rules.
        if (! $this->validateData($post, [
            'title' => 'required|max_length[255]|min_length[3]',
            'body'  => 'required|max_length[5000]|min_length[10]',
        ])) {
            // The validation fails, so returns the form.
            return view('templates/header', ['title' => 'Create a jobs item'])
                . view('jobs/create')
                . view('templates/footer');
        }

        $model = model(JobsModel::class);

        $model->save([
            'title' => $post['title'],
            'slug'  => url_title($post['title'], '-', true),
            'body'  => $post['body'],
        ]);

        return view('templates/header', ['title' => 'Create a jobs item'])
            . view('jobs/success')
            . view('templates/footer');
    }

}
