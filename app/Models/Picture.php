<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class Picture extends Model
{
    use HasFactory;
    protected $fillable=['path','original','name'];
    public function savePicture(string $png, string $name, string $original = 'default'): static
    {
        if (!is_dir($this->path)){
            mkdir($this->path,0777,true);
        }
        $this->deletePicture();
        file_put_contents($this->path.'/'.$name, $png);
        $this->update(['name'=>$name,'original'=>$original]);
        return $this;
    }
    private function pictureCheck():bool
    {
        if (file_exists($this->path.'/'.$this->name)){
            return true;
        }
        return false;
    }
    public function deletePicture(): static
    {
        if ($this->pictureCheck()){
            unlink($this->path.'/'.$this->name);
        }
        return $this;
    }
    public function getPicture(): bool|string
    {
        return file_get_contents($this->path.'/'.$this->name);
    }
}
