#include<GL/glut.h>
int width = 600, height = 600;
int firstClick = 0;
GLfloat x, y;

void init(){
    glClearColor(0, 0, 0, 0);
    glMatrixMode(GL_PROJECTION);
    gluOrtho2D(0, width, height, 0);
    glColor3f(1, 1, 1);
}

void draw(){
    glClear(GL_COLOR_BUFFER_BIT);
}

void clickToDraw(int button, int state, int mouseX, int mouseY){
    if(button == GLUT_LEFT_BUTTON && state == GLUT_DOWN){
        if(!firstClick){
            firstClick = 1;
            x = mouseX;
            y = mouseY;
        }else{
            glBegin(GL_LINES);
                glVertex2d(x, y);
                glVertex2d(mouseX, mouseY);
                x = mouseX;
                y = mouseY;
            glEnd();
            glFlush();
        }
    }
}

int main(int argc, char **argv){
    glutInit(&argc, argv);
    glutInitDisplayMode(GLUT_RGB);
    glutInitWindowPosition(100, 100);
    glutInitWindowSize(width, height);
    glutCreateWindow("Mouse Interaction openGL");
    glutDisplayFunc(draw);
    glutMouseFunc(clickToDraw);
    init();
    glutMainLoop();
    return 0;
}