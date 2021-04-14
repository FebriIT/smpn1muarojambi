<?php

namespace App;


use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{

    protected $primaryKey = 'berita_id';
    protected $dates = ['creadted_at', 'berita_tanggal'];
    protected $table = 'berita';
    protected $fillable = [
        'berita_judul', 'berita_isi', 'berita_tanggal', 'berita_kategori_id',
        'berita_kategori_nama', 'berita_views', 'berita_gambar', 'berita_user_id', 'berita_author',
        'berita_img_slider', 'berita_slug'
    ];



    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('berita_judul')
            ->saveSlugsTo('berita_slug');
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
