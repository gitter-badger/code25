Here is an example, which performs a specific processing, every time it is executed:

<?php

if (!function_exists('imageaffine'))
{
echo 'FUNCTION NOT DEFINED IN THIS VERSION OF PHP';
exit;
}

$base_img = 'affine.png';

$tgt_img1 = 'triangle1.png';

$tgt_img2 = 'triangle2.png';

$arr_affine = [
[ 1, 0, 0, 1, 0, 0 ],
[ 1, 0, 0, 1, 150, 0 ],
[ 1.2, 0, 0, 0.6, 0, 0 ],
[ -1.2, 0, 0, -0.6, 0, 0 ],
[ 1, 2, 0, 1, 0, 0 ],
[ 2, 1, 0, 1, 0, 0 ],
[ cos(15), sin(15), -sin(15), cos(15), 0, 0 ],
[ cos(15), -sin(15), sin(15), cos(15), 0, 0 ]
];

$RSR_base = imagecreatetruecolor(400, 300);
$w = imagesx($RSR_base);
$h = imagesy($RSR_base);

$arr_clip = [ 'x' => 0, 'y' => 0, 'width' => $w, 'height' => $h ];

$fillcolor = imagecolorallocate($RSR_base, 0, 0, 0);

imagefill($RSR_base, 10,10, $fillcolor);

imagepng($RSR_base, $base_img);

$drawcolor = imagecolorallocate($RSR_base, 255, 0, 0); 

$triangle = [ 50, 50, 50, 150, 200, 150 ];
$points = 3;

imageantialias($RSR_base, 1);

$drawtriangle = imagefilledpolygon($RSR_base, $triangle, $points, $drawcolor);

imagepng($RSR_base, $tgt_img1);

$select = mt_rand(0, 7);

// $RSRaff2 = imageaffine($RSR_base, $arr_affine[$select], $arr_clip);

// imagepng($RSRaff2, $tgt_img2, 9);

?>

SUPPORT IMAGE<br><br>
<img src="<?php echo $base_img; ?>" alt="*" /><br><br>

BASE IMAGE<br><br>
<img src="<?php echo $tgt_img1; ?>" alt="*" /><br><br>

RESULT IMAGE<br><br>
<!--img src="<?php echo $tgt_img2; ?>" alt="*" --/>