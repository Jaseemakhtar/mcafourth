#include <GL/glut.h>

GLfloat a[2] = {200.0, 10.0}, 
        b[2] = {10.0, 380.0}, 
        c[2] = {380.0, 380.0};
int width = 400, height = 400;

void drawTriangle(GLfloat *a, GLfloat *b, GLfloat *c, int len){
    glVertex2fv(a);
    glVertex2fv(b);
    glVertex2fv(c);

    if(len > 40){
        GLfloat aa[2], bb[2], cc[2];
        int i;
        for(i=0; i<2; i++){
            aa[i] = (a[i] + b[i]) / 2;
            bb[i] = (b[i] + c[i]) / 2;
            cc[i] = (c[i] + a[i]) / 2;
        }
        drawTriangle(a, aa, cc, len-10);
        drawTriangle(b, bb, aa, len-10);
        drawTriangle(c, cc, bb, len-10);
    }
}

void draw(){
    glClearColor(0, 0, 0, 0);
    glClear(GL_COLOR_BUFFER_BIT);
    glColor3f(1.0, 1.0, 1.0);

    glPolygonMode(GL_FRONT_AND_BACK, GL_LINE); //No Fill
    glBegin(GL_TRIANGLES);
        drawTriangle(a, b, c, 100);
    glEnd();

    glFlush();
}

void init(void) {
    glClearColor(0.0,0.0,0.0,0.0); 
    glMatrixMode(GL_PROJECTION); 
    gluOrtho2D(0.0, width, height, 0.0);
    // Left, Right, Bottom, Top   
}

int main(int argc, char **argv){
    glutInit(&argc, argv);
    glutInitDisplayMode(GLUT_RGB);
    glutInitWindowPosition(100, 100);
    glutInitWindowSize(width, height);
    glutCreateWindow("Sierpinsky Gasket");
    glutDisplayFunc(draw);
    init();
    glutMainLoop();
    return 0;
}