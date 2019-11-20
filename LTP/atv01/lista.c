#include "stdio.h"
#include "math.h"
#include "string.h"

enum{false, true};

double esfera(double);
double media(double, double, double, char);
int primo();
void bas(int*, int*, int*, float*, float*);
void hora(int*, int*, int*);
void diasNasc(int*, int*, int*, int*);
int perfeito(int*);
int menu();

int main(){
    
    int n, r;
    printf("Digite um Valor para verificar se é perfeito: ");
    scanf("%d", &n);

    r = perfeito(&n);

    printf("%d", &r);
}

int menu(){
    int op;

    printf("Digite 1 para Calcular volume da Esfera\n");
    printf("Digite 2 para Calcular Média\n");
    printf("Digite 0 para Sair\n");
    scanf("%d", &op);

    return op;
}

//1
double esfera(double r){
    double v;
    v = (4 * M_PI * pow(r, 3)) / 3;
    printf("%lf\n\n", v);

    return v;
    //Parte do código que vai se repetir no Switch Case
    //double e;
    //e = esfera(4);
    //printf("%0.2lf\n", e);
}

//2
double media(double n1, double n2, double n3, char s){
    double m;
    if(s == 'A'){
        m = (n1 + n2 + n3) / 3;
        printf("%lf\n\n", m);
    }
    else if(s == 'P'){
        m = ((5 * n1) + (3 * n2) + (2 * n3)) / (5 + 3 + 2);
        printf("%lf\n\n", m);
    }
    else{
        printf("Opção Inválida");
    }
    return m;

    /* Parte do Codigo que vai pra Main
    double n1, n2, n3, me;
    char s;
    printf("Digite a Primeira nota\n");
    scanf("%lf", &n1);
    printf("Digite a Segunda nota\n");
    scanf("%lf", &n2);
    printf("Digite a Terceira nota\n");
    scanf("%lf", &n3);

    printf("Digite A para média aritimética ou P para média ponderada \n");
    scanf("%s", &s);

    me = media(n1, n2, n3, s);
    printf("\n\n\n %.1lf\n", me);

    return 0; */

}

//3
int primo(int x){
    int result = 0;
    for (int i = 2; i <= x / 2; i++) {
        if (x % i == 0) {
            result++;
            break;
        }
    }

    if(result == 0){
        printf("%d é um número primo\n", x);
        return 1;
    }else{
        printf("%d não é um número primo\n", x);
        return 0;
    }

    /* Parte da Main
    int v, num;
    printf("Digite um número: ");
    scanf("%d", &num);

    v = primo(num);
    
    printf("%i", v);
    return 0;*/
}

//4  ERRO
void bas(int *a, int *b, int *c, float *x1, float *x2){
    float d = 0;
    d = pow((*b), 2) - 4 * (*a) * (*c);
    if(d < 0){
        *x1 = 0;
        *x2 = 0;
    }else{
        *x1 = (-(*b) + sqrt(d)) / (2 * (*a));
        *x2 = (-(*b) - sqrt(d)) / (2 * (*a));
    }
    
    //Erro no Código
    //Parte que fica na main
    /*int a, b, c;
    float x1, x2;
    printf("Digite o valor de A: ");
    scanf("%d", &a);
    printf("Digite o valor de B: ");
    scanf("%d", &b);
    printf("Digite o valor de C: ");
    scanf("%d", &c);
    
    bas(&a, &b, &c, &x1, &x2);

    if(x1 == 0 && x2 == 0){
        printf("Não tem raiz exata\n\n");
    }else{
        printf("%d\n\n", x1);
        printf("%d\n\n", x2);
    }*/
}

//5
void hora(int *s, int *h, int *m){
    *h = *s / 3600;
    *m = (*s % 3600) / 60;
    *s = *s - ((*h * 3600) + (*m * 60));

    //Parte da main
    /*int h, m, s;

    printf("Digite Quantos segundos deseja Calcular: ");
    scanf("%d", &s);

    hora(&s, &h, &m);

    printf("%2d:%2d:%2d \n", h, m, s);*/

}

//6
void diasNasc(int *a, int *m, int *d,int *x){
    *x = (*a * 365) + (*m * 30) + *d;

    // Parte da Main
    /*int a, m, d, x = 0;

    printf("Digite sua idade em Anos Mêses e dias: ");
    scanf("%d %d %d", &a, &m, &d);

    diasNasc(&a, &m, &d, &x);

    printf("Você tem %d dias de nascido.\n", x); */
}

//7  ERRO
int perfeito(int *n){
    int i, r=0;
    for(i = 0; i <= *n/2; i++){
        if((*n % i) == 0){
            r++;
        }
    }
    if(r == 0){
        return 0;
    }else{
        return 1;
    }

    //Verificar Erro
    // main
    /**/
}

//8
