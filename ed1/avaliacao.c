#include <stdio.h>
#include <stdlib.h>

typedef struct no{
   int valor;
   struct no *prox; 
}No;



int main(){
    int i = 5;
    int *p;

    p = &i;
    printf("%x %d %d %d %d \n", p,*p+2,**&p,3**p,**&p+4);

    return 0;
}