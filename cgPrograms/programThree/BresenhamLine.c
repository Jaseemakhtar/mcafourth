#include<graphics.h>
#include<stdio.h>
#include<math.h>

void bresenham(int x1, int y1, int x2, int y2){
    int dx, dy, p, x, y, xend;
    
    dx = abs(x2 - x1);

    dy = abs(y2 - y1);
    p = 2 * dy - dx;
    
    if(x1 < x2){
        x = x1;
        y = y1;
        xend = x2;
    }else{
        x = x2;
        y = y2;
        xend = x1;
    }
    putpixel(x, y, 7);
    while(x <= xend){
        ++x;
        ++x1;
        if(p < 0){
            p += 2 * dy;
        }else{
            ++y;
            ++y1;
            p += 2 * dy - dx;
        }
        putpixel(x1, y1, 7);
        delay(20);
    }
}

int main(){
    int gd = DETECT, gm;
    initgraph(&gd,&gm,NULL);
    bresenham(10, 50, 200, 50);
    getch();
    closegraph();
    return 0;
}