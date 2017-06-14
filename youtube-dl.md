# YOUTUBE-DL

## Get a list of file formats:
```
main64@mycomputerok:~$ /usr/local/bin/youtube-dl -F https://www.youtube.com/watch?v=2UlBzmRigOU
[youtube] 2UlBzmRigOU: Downloading webpage
[youtube] 2UlBzmRigOU: Downloading video info webpage
[youtube] 2UlBzmRigOU: Extracting video information
[youtube] 2UlBzmRigOU: Downloading MPD manifest
[info] Available formats for 2UlBzmRigOU:
format code  extension  resolution note
139          m4a        audio only DASH audio   50k , m4a_dash container, mp4a.40.5@ 48k (22050Hz), 11.66MiB
249          webm       audio only DASH audio   74k , opus @ 50k, 13.36MiB
250          webm       audio only DASH audio   96k , opus @ 70k, 17.42MiB
140          m4a        audio only DASH audio  129k , m4a_dash container, mp4a.40.2@128k (44100Hz), 31.13MiB
171          webm       audio only DASH audio  168k , vorbis@128k, 29.49MiB
251          webm       audio only DASH audio  184k , opus @160k, 33.66MiB
278          webm       192x144    144p   23k , webm container, vp9, 30fps, video only, 2.77MiB
242          webm       320x240    240p   29k , vp9, 30fps, video only, 4.73MiB
243          webm       480x360    360p   44k , vp9, 30fps, video only, 7.44MiB
134          mp4        540x360    DASH video   51k , avc1.4d401e, 30fps, video only, 8.36MiB
160          mp4        216x144    DASH video   81k , avc1.4d400c, 30fps, video only, 7.40MiB
244          webm       640x480    480p   84k , vp9, 30fps, video only, 13.47MiB
135          mp4        720x480    DASH video  112k , avc1.4d401e, 30fps, video only, 14.21MiB
133          mp4        360x240    DASH video  139k , avc1.4d400d, 30fps, video only, 10.53MiB
17           3gp        176x144    small , mp4v.20.3, mp4a.40.2@ 24k
36           3gp        320x214    small , mp4v.20.3, mp4a.40.2
18           mp4        540x360    medium , avc1.42001E, mp4a.40.2@ 96k
43           webm       640x360    medium , vp8.0, vorbis@128k (best)

```
## Then download selected format (in this case m4a 140):
```
main64@mycomputerok:~$ /usr/local/bin/youtube-dl https://www.youtube.com/watch?v=2UlBzmRigOU -f 140

```
