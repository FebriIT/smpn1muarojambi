<?php

namespace App;


use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Berita extends Model
{
    use Sluggable;

    protected $dates = ['creadted_at', 'berita_tanggal'];
    protected $table = 'berita';
    protected $fillable = [
        'berita_judul', 'berita_isi', 'berita_tanggal', 'kategori_id',
        'berita_views', 'berita_gambar', 'user_id',
        'berita_img_slider', 'berita_slug'
    ];



    /**
     * Get the options for generating the slug.
     */
    // public function getSlugOptions(): SlugOptions
    // {
    //     return SlugOptions::create()
    //         ->generateSlugsFrom('berita_judul')
    //         ->saveSlugsTo('berita_slug');
    // }
    public function sluggable(): array
    {
        return [
            'berita_slug' => [
                'source' => 'berita_judul'
            ]
        ];
    }
    public function getGambar()
    {
        if (!$this->berita_gambar) {
            return asset('images/berita/default.jpg');
        }
        return asset('images/berita/' . $this->berita_gambar);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
