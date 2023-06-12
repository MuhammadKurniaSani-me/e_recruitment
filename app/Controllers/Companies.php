<?php

namespace App\Controllers;

use App\Models\CompaniesModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Companies extends BaseController
{
    public function index()
    {
        $model = model(CompaniesModel::class);

        $data = [
            'companies'  => $model->getCompanies(),
            'title' => 'Companies archive',
        ];

        return view('templates/header', $data)
            . view('companies/index')
            . view('templates/footer');
    }

    public function view($slug = null)
    {
        $model = model(CompaniesModel::class);

        $data['companies'] = $model->getCompanies($slug);

        if (empty($data['companies'])) {
            throw new PageNotFoundException('Cannot find the Companies item: ' . $slug);
        }

        $data['title'] = $data['companies']['title'];

        return view('templates/header', $data)
            . view('companies/view')
            . view('templates/footer');
    }

    public function create()
    {
        helper('form');

        // Checks whether the form is submitted.
        if (! $this->request->is('post')) {
            // The form is not submitted, so returns the form.
            return view('templates/header', ['title' => 'Create a Companies item'])
                . view('companies/create')
                . view('templates/footer');
        }

        $post = $this->request->getPost(['title', 'body']);

        // Checks whether the submitted data passed the validation rules.
        if (! $this->validateData($post, [
            'title' => 'required|max_length[255]|min_length[3]',
            'body'  => 'required|max_length[5000]|min_length[10]',
        ])) {
            // The validation fails, so returns the form.
            return view('templates/header', ['title' => 'Create a Companies item'])
                . view('companies/create')
                . view('templates/footer');
        }

        $model = model(CompaniesModel::class);

        $model->save([
            'title' => $post['title'],
            'slug'  => url_title($post['title'], '-', true),
            'body'  => $post['body'],
        ]);

        return view('templates/header', ['title' => 'Create a Companies item'])
            . view('companies/success')
            . view('templates/footer');
    }

}
