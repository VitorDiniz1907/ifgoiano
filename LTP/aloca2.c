/*Escreva uma aplicação em linguagem C que leia do usuário um vetor a ser preenchido, 
utilize exclusivamente alocação dinâmica, leia do usuário os valores flutuantes do vetor e 
desenvolva duas funções, uma que imprima em ordem crescente e outra em ordem decrescente. */
// Falta terminar
#include "stdio.h"
#include "stdlib.h"

int main(){
    int *cont = malloc(sizeof(int));
    int *valor = malloc(sizeof(int));
    float *vetor = malloc(sizeof(float));
    cont = 0;

    do{
        printf("Digite os valores a serem armazenados: ");
        scanf("%d", valor);
        if((*valor) < 0){
            break;
        }

        vetor = realloc(vetor, sizeof(int) * (*cont));
        vetor[(*cont)] = (*valor);

    }while (valor > 0);
    
    
    return 0;
}