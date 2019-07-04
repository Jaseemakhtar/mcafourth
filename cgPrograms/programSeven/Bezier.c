#include<graphics.h>
#include<stdio.h>
#include<math.h>

void bezier(int x[4], int y[4]){
    int i;
    double t;
    for(t = 0.0; t < 1.0; t += 0.0005){
        double xt = pow(1-t, 3) * x[0] + 
                    pow(1-t, 2) * x[1] * 3 * t +
                    pow(1-t, 1) * x[2] * 3 * pow(t, 2)+
                    x[3] * pow(t, 3);

        double yt = pow(1-t, 3) * y[0] + 
                    pow(1-t, 2) * y[1] * 3 * t +
                    pow(1-t, 1) * y[2] * 3 * pow(t, 2)+
                    y[3] * pow(t, 3);

        putpixel(xt, yt, WHITE);
        delay(10);
    }

    for(i=0; i<4; i++)
        putpixel(x[i], y[i], RED);

    getch();
    closegraph();
}

int main(){
    int x[4] = {
        100, 100, 400, 400
    };
    int y[4] = {
        400, 100, 100, 400
    };
    int gd = DETECT, gm;
    initgraph(&gd,&gm,NULL);
    bezier(x, y);
    getch();
    closegraph();
    return 0;
}