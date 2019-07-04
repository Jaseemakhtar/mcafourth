#include<graphics.h>
#include<stdio.h>
#include<math.h>

void koch(int x1, int y1, int x2, int y2, int l){
    float a = 60 * 3.142 / 180;

    int x3 = (x1 * 2 + x2) / 3;
    int y3 = (y1 * 2 + y2) / 3;

    int x4 = (x2 * 2 + x1) / 3;
    int y4 = (y2 * 2 + y1) / 3;

    int x = (x3 + (x4 - x3) * cos(a)) + ((y4 - y3) * sin(a));
    int y = (y3 - (x4 - x3) * sin(a)) + ((y4 - y3) * cos(a));

    if(l > 0){
        koch(x1, y1, x3, y3, l - 2);
        koch(x3, y3, x, y, l - 2);
        koch(x, y, x4, y4, l - 2);
        koch(x4, y4, x2, y2, l - 2);
    }else{
        line(x1, y1, x3, y3);
        line(x3, y3, x, y);
        line(x, y, x4, y4);
        line(x4, y4, x2, y2);
    }
}

int main(){
    int gd = DETECT, gm;
    initgraph(&gd,&gm,NULL);
    koch(10, 300, 400, 300, 6);
    getch();
    closegraph();
    return 0;
}