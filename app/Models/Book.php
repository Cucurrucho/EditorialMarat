<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model {

	protected $appends = [
		'authorsList'
	];

	public function authors() {
		return $this->belongsToMany(Author::class);
	}

	public function photos() {
		return $this->hasMany(Photo::class);
	}


	public function getFullDataAttribute() {
		return collect([
			[
				'name' => 'title',
				'label' => 'Titulo',
				'type' => 'text',
				'value' => $this->title ?? '',
			], [
				'name' => 'about',
				'label' => 'Descripcion',
				'type' => 'textarea',
				'value' => $this->about ?? '',
			],
			[
				'name' => 'pages',
				'label' => 'Paginas',
				'type' => 'text',
				'subType' => 'number',
				'value' => $this->pages ?? '',
			],
			[
				'name' => 'authors',
				'type' => 'multiselect',
				'label' => 'Autores',
				'options' => Author::select('name', 'id')->get(),
				'optionsLabel' => 'name',
				'value' => $this->authors()->select('name', 'authors.id')->get(),
			],
			[
				'name' => 'price',
				'label' => 'Precio',
				'type' => 'text',
				'subType' => 'number',
				'value' => $this->price ?? '',
			],
			[
				'name' => 'translation',
				'label' => 'Traductor',
				'type' => 'text',
				'value' => $this->translation ?? ''
			],
			[
				'name' => 'published',
				'label' => 'Fecha de Publicacion',
				'type' => 'text',
				'subType' => 'date',
				'value' => $this->published ?? ''
			],
			[
				'name' => 'ISBN',
				'label' => 'ISBN',
				'type' => 'text',
				'value' => $this->ISBN ?? ''
			],
			[
				'name' => 'saleLink',
				'label' => 'Enlace de venta',
				'type' => 'text',
				'value' => $this->sale_link ?? ''
			]
		]);
	}

	public function getAuthorsListAttribute() {
		return $this->authors->implode('name', ', ');
	}
}
