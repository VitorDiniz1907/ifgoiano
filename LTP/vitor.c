/*/Desenvolva uma aplicação utilizando como motivação a linguagem de programação C, que leia do 
usuario, o tamanho de um vetor, a ser preenchido, faça a alocação dinamica da memória, leia do 
usuario seus valores inteiros e imprima-os em ordem crescente e decrescente.*/

#include "stdio.h"
#include "stdlib.h"
/*void ler(int*, int);
void imprimir(int*, int);
int comparacao(const void*, const void*);
int main(){
    int tamanho;
    int *vetor;
    printf("Informe o tamanho do vetor a ser alocado dinamicamente \n");
    scanf("%d", &tamanho);
    vetor = malloc(sizeof(int) * tamanho);//Alocação Dinamica
    //vetor = (int*) malloc(sizeof(int) * tamanho); alocação com filtro, obrigatório em Windows
    ler(vetor, tamanho);
    qsort(vetor, tamanho, sizeof(int), comparacao);// função que ordena vetor
    imprimir(vetor, tamanho);

    free(vetor);

}

void ler(int *v, int t){
    int i = 0;
    while (i < t){
        printf("Informe o elemento da posição v[%d] \n", i);
        scanf("%d", &v[i]);
        i++;
    }
    
}

void imprimir(int *v, int t){
    int i;
    for(i = 0; i < t; i++){
        printf("V[%d] = %d \n", i, v[i]);
    }
}

int comparacao(const void* a, const void* b){
    return (*(int*)b) - (*(int*)a);
}*/

/*Desenvolva uma aplicação utilizando como motivação a linguagem de programação C que leia uma 
quantidade qualquer de numeros, armazenando-os na memória, pare a leitura quando o usuario entrar 
com um numero negativo, imprima o vetor em ordem crescente e em ordem decrescente*/
void ler(int*);
void imprimir(int*, int);
int comparacao(const void*, const void*);
int main(){
    int cont = 1, valor, i;
    int *vetor = malloc(sizeof(int));
    do{
        printf("Digite os valores a serem armazenados: ");
        scanf("%d", &valor);
        if(valor < 0){
            break;
        }
        
        
        vetor = realloc(vetor, sizeof(int) * cont);//realocação
        vetor[cont -1] = valor;
        cont++;
    }while (valor > 0);

    for (i = 0; i < cont - 1; i++){
        printf("%d \n", vetor[i]);
    }  
        qsort(vetor, cont-1, sizeof(int), comparacao);// função que ordena vetor
        imprimir(vetor, cont-1);

  
}

int comparacao(const void* a, const void* b){
    return (*(int*)a) - (*(int*)b);
}
void imprimir(int *v, int t){
    int i;
    for(i = 0; i < t; i++){
        printf("V[%d] = %d \n", i, v[i]);
    }
}


/*Leia um vetor dinamicamente e informe ao usuário quantos elementos são pares e quantos são 
ímpares */

/*int main(){
    int cont = 1, valor, par = 0, impar = 0;
    int *vetor = malloc(sizeof(int));
    do{
        printf("Digite os valores a serem armazenados: ");
        scanf("%d", &valor);
        if(valor < 0){
            break;
        }
        vetor = realloc(vetor, sizeof(int) * cont);//realocação
        vetor[cont - 1] = valor;
        if(valor % 2 == 0){
            par++;
        }else{
            impar++;
        }
        cont++;
    }while (valor > 0);

    printf("A quantidade de valores Pares é %d \n", par);
    printf("A quantidade de valores Impares é %d\n", impar);

}*/
