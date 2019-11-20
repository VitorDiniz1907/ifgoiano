/*Escreva uma aplicação em linguagem C que solicite ao usuário a quantidade de alunos de uma 
determinada turma e aloque de forma dinânica um vetor de notas. Depois de ler as notas, imprimir 
a média aritimética.
Observação: não deve ocorrer desperdício de memória, após ser utilizada a memória os recursos 
devem ser liberados. */

#include "stdlib.h"
#include "stdio.h"

int main(){
    int *aluno = malloc(sizeof(int));
    int *soma = malloc(sizeof(int));

    printf("Digite a quantidade de Alunos para verificar a média aritimética da turma: ");
    scanf("%d", aluno);

    int *nota = malloc(sizeof(int) * (*aluno));
    int *i = malloc(sizeof(int));
    for((*i) = 0; (*i) < (*aluno) ; (*i)++){
        printf("Digite a nota do aluno nº %d: ", (*i)+1);
        scanf("%d", &nota[(*i)]);
    }

    *soma = 0;
    for((*i) = 0; (*i) < (*aluno); i++){
        (*soma) = (*soma) + nota[(*i)];
    }
    
    ;
    printf("A média da turma é: %d\n", (*soma) / (*aluno));
    free(nota);
    free(aluno);
    free(soma);


    return 0;
}
/*Exercício corrigido MARLUS
int main(){
    int *qtd = (int*) malloc(sizeof(int)); // alocando o recurso
    printf("Informe a quantidade de alunos \n");
    scanf("%d",& (*qtd) );
    printf("%d",*qtd);

    int *vetor = malloc(sizeof(int) * (*qtd)); 
    int *i = malloc(sizeof(int));

    for(*i = 0; *i < *qtd;(*i)++){
        printf("Informe a %d nota \n", (*i)+1);
        scanf("%d", &vetor[*i]);    
    }
    int *soma = malloc(sizeof(int)); 
    *soma = 0;
    for( (*i) = 0; (*i) < (*qtd);(*i)++)
            *soma = vetor[*i] + (*soma);

    printf("A média é %d \n", (*soma) / (*qtd)); 

    free(soma);
    free(i);
    free(vetor); 
    free(qtd);//libera o recurso
    return 0;
} */