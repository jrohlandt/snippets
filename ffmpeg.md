### Convert mp4 to mp3
```
ffmpeg -i video.mp4 -b:a 192K -vn music.mp3
```

#1 Getting Information Pertaining To The Video File
Before performing any action, you must know how to obtain the relevant information about the video file. You can do that with the following command.
 
$  ffmpeg -i  video.avi 
 
Where the video file is named, “video” and it is in .avi video format.

 
#2 Video Conversions
Suppose you want to convert an mp4 video file to a different format, say avi. You can do that with FFmpeg using this command.
 
$ ffmpeg -i video1.avi -s 320x240 -vcodec msmpeg4v2 video2.avi 
 
Here, you must specify the file name on which the action is to be performed. However, you can give a different name to the output file. For instance, in this example, “video1” is the original avi file name while video 2 is the output file name which is to be converted into divx avi format.

 
#3 Split A Video File Into Multiple Images
FFmpeg lets you convert a video file into a series of images that you’d find in the parent folder. To perform this action, you need to give the following command.
 
$  ffmpeg -i  video.avi  image%d.png  
 
Here, “video” is the video file name in avi format which is to be converted into images in png format. The converted images will be named image1.png, image2.png, image3.png and so on. 

 
#4 Compile & Convert Multiple Images Into A Video
After knowing how to convert a video into images, it’s time you should know how to perform the reverse action.  
 
$  ffmpeg -f  image2 -i  image%d.jpg  video.avi 
 
Giving this command will convert all the images from the current directory to an avi video file titled, “video.” 

 
#5 Video To Audio Conversions
With FFmpeg, you can also convert a video file into audio with mp3 or wav formats. This example will show you how to convert an .avi video file into mp3 format. 
 
$  ffmpeg -i  video.avi  -vn  -ar  44100  -ac  2  -ab  192  -f  mp3 audio.mp3  
 
This command will convert the avi video file, “video” from the directory to the mp3 format and the output file name will be “audio.mp3.”

 
#6 Video To GIF Conversions
FFmpeg also lets you convert short video clips into animated GIF images. Following is the linux command which lets you do just that.
 
$  ffmpeg -i  video.avi  gifimage.gif
 
The above command will convert a video titled, “video” from the directory to an animated GIF file titled, “gifimage.”

 
#7 Video-to-Video Conversions
FFmpeg allows you to convert a video file from one format to another video format. Suppose you have a video file in directory with .flv format and you want to change that to .mpg format, then the following command will help you do that.
 
$  ffmpeg -i  video.flv  video.mpg
 
This command will convert a video file named ‘Video’ with .flv format into an .mpg video file of the same name. In the same way, you can perform other video conversions.

 
#8 Muxing Audio/Video Files
FFmpeg also gives you the facility to multiplex/demultiplex audio and video files. The following command will merge two audio and video files into one. 
 
$  ffmpeg -i audio.mp3 -i video.avi video_audio_mix.mpg
 
The above command will multiplex an mp3 audio file titled, “audio” with an avi video file titled, “video.” The resultant muxed file will be in .mpg format.
