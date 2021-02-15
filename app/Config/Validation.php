<?php

namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------

	public $loginUser = [
		'email' => [
			'rules' => 'required|valid_email',
			'errors' => [
				'required' => 'Email tidak boleh kosong',
				'valid_email' => 'Email tidak valid'
			]
		],
		'password' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Password tidak boleh kosong',
			]
		],
	];
	public $input_penduduk = [
		'nik' => [
			'rules' => 'required|is_unique[data_penduduk.nik]|min_length[16]|max_length[16]',
			'errors' => [
				'required' => 'NIK tidak boleh kosong',
				'is_unique' => 'NIK sudah terdaftar',
				'min_length' => 'NIK harus 16 digit',
				'max_length' => 'NIK harus 16 digit'
			]
		],
		'kk' => [
			'rules' => 'required|min_length[16]|max_length[16]',
			'errors' => [
				'required' => 'No KK tidak boleh kosong',
				'min_length' => 'No KK harus 16 digit',
				'max_length' => 'No KK harus 16 digit'
			]
		],
		'nama' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Nama tidak boleh kosong',
			]
		],
		'tanggal_lahir' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Tanggal lahir tidak boleh kosong',
			]
		],
		'tempat_lahir' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Tempat lahir tidak boleh kosong',
			]
		],
		'kewarganegaraan' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Kewarganegaraan tidak boleh kosong',
			]
		],
		'alamat' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Alamat tidak boleh kosong',
			]
		],
		'status_pekerjaan' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Status pekerjaan tidak boleh kosong',
			]
		],
		'agama' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Agama tidak boleh kosong',
			]
		],
		'status_nikah' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Status nikah tidak boleh kosong',
			]
		],
		'nama_ayah' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Nama Ayah tidak boleh kosong',
			]
		],
		'nama_ibu' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Nama Ibu tidak boleh kosong',
			]
		],
		'status_keluarga' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Status keluarga tidak boleh kosong',
			]
		],
		'pendidikan' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Pendidikan tidak boleh kosong',
			]
		],
	];
	public $edit_penduduk = [
		'kk' => [
			'rules' => 'required|min_length[16]|max_length[16]',
			'errors' => [
				'required' => 'No KK tidak boleh kosong',
				'min_length' => 'No KK harus 16 digit',
				'max_length' => 'No KK harus 16 digit'
			]
		],
		'nama' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Nama tidak boleh kosong',
			]
		],
		'tanggal_lahir' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Tanggal lahir tidak boleh kosong',
			]
		],
		'tempat_lahir' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Tempat lahir tidak boleh kosong',
			]
		],
		'kewarganegaraan' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Kewarganegaraan tidak boleh kosong',
			]
		],
		'alamat' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Alamat tidak boleh kosong',
			]
		],
		'status_pekerjaan' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Status pekerjaan tidak boleh kosong',
			]
		],
		'agama' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Agama tidak boleh kosong',
			]
		],
		'status_nikah' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Status nikah tidak boleh kosong',
			]
		],
		'nama_ayah' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Nama Ayah tidak boleh kosong',
			]
		],
		'nama_ibu' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Nama Ibu tidak boleh kosong',
			]
		],
		'status_keluarga' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Status keluarga tidak boleh kosong',
			]
		],
		'pendidikan' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Pendidikan tidak boleh kosong',
			]
		],
	];
	public $tambah_data_keluarga = [
		'nik' => [
			'rules' => 'required|is_unique[data_penduduk.nik]|min_length[16]|max_length[16]',
			'errors' => [
				'required' => 'NIK tidak boleh kosong',
				'is_unique' => 'NIK sudah terdaftar',
				'min_length' => 'NIK harus 16 digit',
				'max_length' => 'NIK harus 16 digit'
			]
		],
		'kk' => [
			'rules' => 'required|min_length[16]|max_length[16]',
			'errors' => [
				'required' => 'No KK tidak boleh kosong',
				'min_length' => 'No KK harus 16 digit',
				'max_length' => 'No KK harus 16 digit'
			]
		],
		'nama' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Nama tidak boleh kosong',
			]
		],
		'tanggal_lahir' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Tanggal lahir tidak boleh kosong',
			]
		],
		'tempat_lahir' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Tempat lahir tidak boleh kosong',
			]
		],
		'kewarganegaraan' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Kewarganegaraan tidak boleh kosong',
			]
		],
		'alamat' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Alamat tidak boleh kosong',
			]
		],
		'status_pekerjaan' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Status pekerjaan tidak boleh kosong',
			]
		],
		'agama' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Agama tidak boleh kosong',
			]
		],
		'status_nikah' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Status nikah tidak boleh kosong',
			]
		],
		'nama_ayah' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Nama Ayah tidak boleh kosong',
			]
		],
		'nama_ibu' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Nama Ibu tidak boleh kosong',
			]
		],
		'status_keluarga' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Status keluarga tidak boleh kosong',
			]
		],
		'pendidikan' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Pendidikan tidak boleh kosong',
			]
		],
	];

	public $input_agama = [
		'agama' => [
			'rules' => 'required|is_unique[master_agama.agama]',
			'errors' => [
				'required' => 'Agama tidak boleh kosong',
				'is_unique' => 'Agama sudah ada'
			]
		]
	];

	public $input_negara = [
		'negara' => [
			'rules' => 'required|is_unique[master_negara.negara]',
			'errors' => [
				'required' => 'Negara tidak boleh kosong',
				'is_unique' => 'Negara sudah ada'
			]
		]
	];

	public $input_pendidikan = [
		'pendidikan' => [
			'rules' => 'required|is_unique[master_pendidikan.pendidikan]',
			'errors' => [
				'required' => 'Pendidikan tidak boleh kosong',
				'is_unique' => 'Pendidikan sudah ada'
			]
		]
	];

	public $input_pindah = [
		'nik' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'nik tidak boleh kosong',
			]
		],
		'alamat_baru' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Alamat baru tidak boleh kosong',
			]
		],
		'alasan_pindah' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Alasan pindah tidak boleh kosong',
			]
		],
	];

	public $edit_pindah = [
		'alamat_baru' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Alamat baru tidak boleh kosong',
			]
		],
		'alasan_pindah' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Alasan pindah tidak boleh kosong',
			]
		],
	];
	public $input_kematian = [
		'nik' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'nik tidak boleh kosong',
			]
		],
		'pekerjaan' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Pekerjaan terakhir tidak boleh kosong',
			]
		],
		'umur' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Umur penduduk tidak boleh kosong',
			]
		],
		'tanggal_kematian' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Tanggal kematian tidak boleh kosong',
			]
		],
		'penyebab' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Penyebab meninggal tidak boleh kosong',
			]
		],
		'tempat_pemakaman' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Pempat pemakaman tidak boleh kosong',
			]
		],
	];
	public $edit_kematian = [
		'pekerjaan' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Pekerjaan terakhir tidak boleh kosong',
			]
		],
		'umur' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Umur penduduk tidak boleh kosong',
			]
		],
		'tanggal_kematian' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Tanggal kematian tidak boleh kosong',
			]
		],
		'penyebab' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Penyebab meninggal tidak boleh kosong',
			]
		],
		'tempat_pemakaman' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Pempat pemakaman tidak boleh kosong',
			]
		],
	];
}
