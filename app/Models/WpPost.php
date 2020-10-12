<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WpPost extends Model
{
    use HasFactory;
    
    protected $connection = 'mysql_wp';
    
    protected $table = 'wp_posts';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ID',
        'post_date',
        'post_content',
        'post_title',
        'post_status',
        'post_name',
        'post_type'
    ];
    
    /**
     * Get list
     */
    public static function get_list() {
        # Init
        $data = [];
        
        # Get data
        $data = WpPost::orderBy('ID', 'desc')
                ->where('post_status', 'publish')
                ->where('post_type', 'post')
                ->get()
        ;
        
        return $data;
    }
}
