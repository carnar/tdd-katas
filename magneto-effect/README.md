# Magneto effect

In CAD-programs and other vector-based graphics programs, a popular utility to help drawing is the magneto. In short, it means that small screen areas around "important points" are "magnetic". For example, if the mouse moves close enough to a vector endpoint and clicks to start drawing another vector, the new vector will begin in the magnetic endpoint. On the other hand, if the mouse click comes when the mouse cursor is in open space, the draw operation will begin at the cursor location.

## Examples
1. If there is a magnetic point at coordinate (50,50) and the magneto effect radius is 5, when the mouse is moved to coordinate (49,50), the magneto effect comes into play and forces the "begin draw point" to be (50,50).
2. If there is a magnetic point at coordinate (50,50), when the mouse is moved to (0,0) no mangeto effect affects the begin draw point.
3. If there are magnetic points at coordinate (50,50) and (100,50), when the mouse is moved to (101,48), the magnetic effect is to move the begin draw point to (100,50).
4. If the magnetic point coordinates are (50,50) and (51,51) and the mouse is moved to (51,52), the magneto at (51,51) forces the begin draw point to be (51,51).

Working from the above description, use TDD to implement a class named "MagnetoEffect" (or something that you find "right") to implement this behaviour using SOLID Principles as your main guide.
