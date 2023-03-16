## To figure out if a rectangle is a certain aspect ratio (E.g. 16:9) follow the steps below:


To get an aspect ratio is simple, just divide the width by the height:
```
// width / height = aspect ratio
1280 / 720 = 1.78 (1.78:1)
```

But that does not tell me if 1280 x 720 is 16:9. 
Only way I could find is to compare my result with dimensions that I know are 16:9


E.g. 1920 / 1080 is also 1.7777777777777777777777777777778 
So now I know that 1280 by 720 is also 16:9


The same works for other aspect ratios like ### 9:16.


### It is also possible to calculate new dimensions and keep the aspect ratio the same. 

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

