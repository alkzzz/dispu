<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use DB;

class FooterlinkCrud extends Component
{
    use LivewireAlert;

    public $links, $title, $url, $link_id;
    public $updateMode = false;
    public $deleteMode = false;

    protected $listeners = [
        'confirmDelete'
    ];

    protected function rules()
    {
        return [
            'title' => 'required|string|max:255|unique:links,title' . ($this->link_id ? ",{$this->link_id}" : ''),
            'url' => 'required|url',
        ];
    }

    protected function validationAttributes()
    {
        return [
            'title' => 'Judul Link',
            'url' => 'Alamat Link',
        ];
    }

    public function mount()
    {
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->title = '';
        $this->url = '';
        $this->link_id = null;
        $this->updateMode = false;
        $this->deleteMode = false;
    }

    public function render()
    {
        $this->links = DB::table('footer_links')->orderBy('title')->get()->split(2);
        return view('livewire.footerlink-crud', ['links' => $this->links]);
    }

    public function store()
    {
        $this->validate();
        DB::table('footer_links')->insert([
            'title' => $this->title,
            'url' => $this->url
        ]);
        $this->resetForm();
        session()->flash('message', 'Link terkait baru telah ditambahkan.');
    }

    public function edit($id)
    {
        $link = DB::table('footer_links')->where('id', $id)->first();
        $this->link_id = $link->id;
        $this->title = $link->title;
        $this->url = $link->url;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate();
        DB::table('footer_links')->where('id', $this->link_id)
            ->update([
                'title' => $this->title,
                'url' => $this->url
            ]);

        $this->resetForm();
        session()->flash('message', 'Custom Link telah diupdate.');
    }

    public function delete($id)
    {
        $link = DB::table('footer_links')->where('id', $id)->first();
        $this->link_id = $link->id;
        $this->alert('warning', 'Hapus Custom Link?', [
            'text' => 'Menghapus link yang ada pada menu juga akan menghapus menu tersebut!',
            'position' => 'center',
            'timer' => false,
            'toast' => false,
            'showConfirmButton' => true,
            'confirmButtonText' => '<i
            class="fa-solid fa-trash-can"></i> Ya, Hapus saja',
            'confirmButtonColor' => '#3085d6',
            'cancelButtonColor' => '#d33',
            'cancelButtonText' => '<i class="fa-solid fa-ban"></i> Cancel',
            'onConfirmed' => 'confirmDelete',
            'showCancelButton' => true,
        ]);
    }

    public function confirmDelete()
    {
        DB::table('footer_links')->delete($this->link_id);

        session()->flash('message', 'Link terkait telah dihapus.');

        $this->deleteMode = false;
        $this->resetForm();
    }
}
