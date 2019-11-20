//Descrição dos Exercício Diponível no Moodle
#include "stdio.h"
#include "math.h"
int menu();
int exe2(int, int);
int exe3(int, int);
int exe4(int);
int atv5a(int, int);
int atv5b(int, int);
int atv6(int*, int);
int main(){
    int op;
    do{
        op = menu();
        switch (op){
            case 1:{
                printf("'Recursividade' é um termo usado de maneira mais geral para descrever o processo de repetição de um objeto de um jeito similar ao que já fora mostrado. Um bom exemplo disso são as imagens repetidas que aparecem quando dois espelhos são apontados um para o outro.\n\n");
            }break;

            case 2:{
                int n, y, r;
                printf("Digite o primeiro valor: ");
                scanf("%i", &n);

                printf("Digite a potencia do numero: ");
                scanf("%i", &y);

                printf("O valor de %i^%i = %i \n\n\n", n, y, exe2(n, y));

            }break;

            case 3:{
                int a, b;
                printf("Digite o primeiro valor: ");
                scanf("%i", &a);

                printf("Digite o segundo valor: ");
                scanf("%i", &b);

                printf("O MDC de %i e %i é %i\n\n\n", a, b, exe3(a,b));
            }break;

            case 4:{
                int x, y;
                printf("Digite a primeira posição desejada: ");
                scanf("%i", &x);
                printf("O Valor que está na posição %i é %i\n\n\n", x, exe4(x));

            }break;

            case 51:{
                int n, x;
                printf("Digite o Valor de Base: ");
                scanf("%i", &x);
                printf("Digite o Valor da Potência: ");
                scanf("%i", &n);

                printf("O valor resultade de %i^%i = %i\n\n\n", x, n, atv5a(x, n));

            }break;

            case 52:{
                int n, x;
                printf("Digite o Valor de Base: ");
                scanf("%i", &x);
                printf("Digite o Valor da Potência: ");
                scanf("%i", &n);
                printf("O valor resultade de %i^%i = %i\n\n\n", x, n, atv5b(x, n));
            }break;

            case 6:{
                int t;
                printf("Digite o tamanho do seu vetor: ");
                scanf("%i", t);
                int v[t], i;
                printf("Digite os valores de seu vetor: ");
                for(i = 0; i < t; i++){
                    scanf("%d", &v[i]);
                }

                printf("%d", atv6(v, t));
            }break;
            
            default:{
                break;
            }
        }
    }while (op != 0);

    return 0;
    
}

int menu(){
    int op;
    printf("Digite 1 para Conceito de Recursividade \n");
    printf("Digite 2 para Calcular Potenciação \n");
    printf("Digite 3 para Calcular o MDC de dois Números \n");
    printf("Digite 4 para Calcular o Valor em Determinadas Posições da função \n");
    printf("Digite 51 para Calcular Potência Segundo a Fórmula 1.1 \n");
    printf("Digite 52 para Calcular Potência de Dois Numeros inteiros \n");
    printf("Digite 6 para  \n");
    printf("Digite 0 para Sair\n");
    scanf("%d", &op);

    return op;
}

//Corrigida
int exe2(int n, int y){
    if(y == 1){
        return n;
    }else{
        return exe2(y-1, n) * n;
    }
}

//Corrigido
int exe3(int a, int b){
    /*int q = 0, r = 0;
    do{
        q = b / a;
        r = b % a;

        b = a;      
        if(r){
            a = r;
        }
    }while(r != 0);

    return a;*/

    if((a % b) == 0){
        return b;
    }
    return exe3(a%b, b);

}

//Corrigido
int exe4(int a){
    /*if(a < 4){
        return 3 * a;
    }else{
        return 2 * ((a - 4) + 5);
    }*/

    if(a < 4){
        return 3 * a;
    }
    else{
        return 2 * exe4(a - 4) +5;
    }
    
}

int atv5a(int x, int n){
    /*if(n == 0){
        return 1;
    }
    else if((n % 2) == 0){
        return pow(pow(x, n/2), 2);
    }
    else if((n % 2) != 0){
        return x * pow(x, n - 1);
    }*/

    if(n == 0){
        return 1;
    }else if((n % 2) == 0){
        return pow(atv5a(x, n/2),2);
    }else{
        return x * atv5a(x, n - 1);
    }

}

int atv5b(int x, int n){
    return pow(x, n);
}

int atv6(int *v, int t){
    int r = 0;
    for(int i = 0; i < t; i++){
        r = r + v[i];
    }
    return r;
}