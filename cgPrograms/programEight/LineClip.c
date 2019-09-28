#include<graphics.h>
#include<stdio.h>
#include<math.h>

int vxmin = 100, vymin = 100, vxmax = 500, vymax = 400;
int TOP = 8, 
    BOTTOM = 4, 
    RIGHT = 2, 
    LEFT = 1, 
    TOP_LEFT = 9, 
    TOP_RIGHT = 10, 
    BOTTOM_LEFT = 5, 
    BOTTOM_RIGHT = 6,
    CENTER = 0;

void lineClip(){

}

int checkRegion(int x, int y){
    if(x < vxmin && y < vymin){
        return TOP_LEFT;
    }else if(x > vxmin && x < vxmax && y < vymin ){
        return TOP;
    }else if(x > vxmax && y < vymin){
        return TOP_RIGHT;
    }else if(x < vxmin && y > vymin && y < vymax){
        return LEFT;
    }else if(x > vxmax && y < vymin){
        return BOTTOM_LEFT;
    }else if(x > vxmin && x < vxmax && y > vymax){
        return BOTTOM;
    }else if(x > vxmax && y > vymax){
        return BOTTOM_RIGHT;
    }else if(x > vxmax && y > vymin && y < vymax){
        return RIGHT;
    }else{
        return CENTER;
    }
}

void setViewport(){
    line(vxmin, vymin, vxmax, vymin);
    line(vxmax, vymin, vxmax, vymax);
    line(vxmax, vymax, vxmin, vymax);
    line(vxmin, vymax, vxmin, vymin);
}

int main(){
    int gd = DETECT, gm;
    initgraph(&gd,&gm,NULL);
    setViewport();
    getch();
    closegraph();
    return 0;
}