For my purposes I needed to figure out the aspect ratio of a rectangle. I basically needed to know if it was 16:9 and if not how close was it.


To get an aspect ratio is simple, just divide the width by the height:

// width / height = aspect ratio
1280 / 720 = 1.78 (1.78:1)

But that does not tell me if 1280 x 720 is 16:9. 
Only way I could find is to compare my result with dimensions that I know are 16:9


1920 / 1080 = 1.7777777777777777777777777777778 so that how I know 1280 by 720 is also 16:9


The same works for other aspect ratios like 9:16.


You can also calculate a new dimensions. 
E.g. if you want the same aspect ratio but at a specific height:
```
// we already know the newHeight so just calculate the newWidth
originalWidth / originalHeight) * newHeight = newWidth
```

Or for a specific width:
```
// already know the newWidth so just calculate the newHeight
(originalHeight / originalWidth) * newWidth = newHeight
```

Another way to get new dimensions is just to scale the dimensions:
```
newWidth / orignalWidth = scale
originalHeight * scale = newHeight
```

