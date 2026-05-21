<?php

namespace App\Controllers;

use App\Models\UserAddressModel;

class AddressController extends BaseController
{
    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $addressModel = new UserAddressModel();

        $addresses = $addressModel
            ->where('user_id', session()->get('user_id'))
            ->orderBy('is_default', 'DESC')
            ->orderBy('id', 'DESC')
            ->findAll();

        return view('auth/addresses', [
            'addresses' => $addresses
        ]);
    }

    public function create()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        return view('auth/create_address');
    }

    public function store()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $addressModel = new UserAddressModel();
        $userId = session()->get('user_id');

        $isDefault = $this->request->getPost('is_default') ? 1 : 0;

        if ($isDefault === 1) {
            $addressModel
                ->where('user_id', $userId)
                ->set(['is_default' => 0])
                ->update();
        }

        $addressModel->insert([
            'user_id'      => $userId,
            'title'        => $this->request->getPost('title'),
            'full_name'    => $this->request->getPost('full_name'),
            'phone'        => $this->request->getPost('phone'),
            'city'         => $this->request->getPost('city'),
            'district'     => $this->request->getPost('district'),
            'full_address' => $this->request->getPost('full_address'),
            'is_default'   => $isDefault
        ]);

        return redirect()->to('/addresses')->with('success', 'Adres başarıyla eklendi.');
    }

    public function edit(int $id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $addressModel = new \App\Models\UserAddressModel();

        $address = $addressModel
            ->where('id', $id)
            ->where('user_id', session()->get('user_id'))
            ->first();

        if (!$address) {
            return redirect()->to('/addresses')->with('error', 'Adres bulunamadı.');
        }

        return view('auth/edit_address', [
            'address' => $address
        ]);
    }

    public function update(int $id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $addressModel = new UserAddressModel();
        $userId = session()->get('user_id');

        $address = $addressModel
            ->where('id', $id)
            ->where('user_id', $userId)
            ->first();

        if (!$address) {
            return redirect()->to('/addresses')->with('error', 'Adres bulunamadı.');
        }

        $isDefault = $this->request->getPost('is_default') ? 1 : 0;

        if ($isDefault === 1) {
            $addressModel
                ->where('user_id', $userId)
                ->set(['is_default' => 0])
                ->update();
        }

        $addressModel->update($id, [
            'title'        => $this->request->getPost('title'),
            'full_name'    => $this->request->getPost('full_name'),
            'phone'        => $this->request->getPost('phone'),
            'city'         => $this->request->getPost('city'),
            'district'     => $this->request->getPost('district'),
            'full_address' => $this->request->getPost('full_address'),
            'is_default'   => $isDefault
        ]);

        return redirect()->to('/addresses')->with('success', 'Adres başarıyla güncellendi.');
    }

    public function delete(int $id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $addressModel = new UserAddressModel();

        $address = $addressModel
            ->where('id', $id)
            ->where('user_id', session()->get('user_id'))
            ->first();

        if (!$address) {
            return redirect()->to('/addresses')->with('error', 'Adres bulunamadı.');
        }

        $addressModel->delete($id);

        return redirect()->to('/addresses')->with('success', 'Adres silindi.');
    }

    public function makeDefault(int $id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $addressModel = new UserAddressModel();
        $userId = session()->get('user_id');

        $address = $addressModel
            ->where('id', $id)
            ->where('user_id', $userId)
            ->first();

        if (!$address) {
            return redirect()->to('/addresses')->with('error', 'Adres bulunamadı.');
        }

        $addressModel
            ->where('user_id', $userId)
            ->set(['is_default' => 0])
            ->update();

        $addressModel->update($id, [
            'is_default' => 1
        ]);

        return redirect()->to('/addresses')->with('success', 'Varsayılan adres güncellendi.');
    }
}