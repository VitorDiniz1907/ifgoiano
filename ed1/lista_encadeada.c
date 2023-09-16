#include <stdio.h>
#include <stdlib.h>

typedef struct no{
    int dado;
    struct no *prox;//Ponteiro do tipo struct no (Definição do tipo de dado)
}No;

int menu(){
    int opc;
    printf("[0] Sair.\n");
    printf("[1] Mostrar Lista.\n");
    printf("[2] Inserir valor no início.\n");


}

int inserir_inicio(No **l, int vlr){
    No *novo;
    novo = (No *)malloc(sizeof(No));

    novo->dado = vlr;
    novo->prox = NULL;

    if(*l == NULL){
        *l = novo;
    }else{
        novo->prox = *l; //Novo no campo próx recebe o valor de *l
        *l = novo;//Cabeça da lista passa a receber o endereço do valor que será inserido na lista
    }

}

void mostrar_lista(No **l){
    if(*l == NULL){
        printf("Lista Vazia.\n");
    }
    No *p;
    for(p = *l; p != NULL; p = p->prox){
        printf("%i\n", p->dado);
    }
}

int inserir_fim(No **l, int vlr){
    No *novo;
    novo = (No *)malloc(sizeof(No));
    if(novo == NULL){
        return 0;
    }

    novo->dado = vlr;
    novo->prox = NULL;

    if(*l == NULL){
        *l = novo;
    }else{
        No *p;
        for(p = *l; p->prox != NULL; p = p->prox);//Laço sem {} é pra indicar que irá percorrer todo a listae deixar o p->prox no último item da lista.

        p->prox = novo;
    }
    return 1;
}

int remover_inicio(No **l){
    if(*l == NULL){
        return 0;
    }

    No *p;
    p = *l;//Apontamento para o primeiro elemento da lista.
    *l = p->prox; //Lista l recebe o endereço que tinha armazenado da primeira posição(linha anterior).
    
    free(p); //Limpar memória que havia reservado para a variável p.

    return 1;
}

int remover_fim(No **l){
    if(*l == NULL){
        return 0;
    }
    
    No *p, *q;
    for(p = *l, q = NULL; p->prox != NULL; p=p->prox){
        q = p;
    }//Laço faz com que varíavel p e q andem juntas
    if(q == NULL){ //Se q for igual à NULL, a lista só possui um elemento
        free(p);
        *l = NULL;
    }else{//Se q for diferente de NULL, a lista possui mais de um elemento
        q->prox = NULL;
        free(p);
    }

    return 1;    
}

int inserir_ordenado(No **l, int vlr){
    No *novo;
    novo = (No *)malloc(sizeof(No));
    if(novo == NULL){
        return 0;
    }
    novo->dado = vlr;
    novo->prox = NULL;

    if(*l == NULL){
        *l = novo;
        return 1;//com esse return não é necessário usar Else
    }
    No *p, *q = NULL;
    for(p = *l; p !=NULL; p = p->prox){
        if(vlr < p->dado){
            break;
        }
        q = p;
    }
    if(q == NULL){//Inserção no Início
        novo->prox = *l;
        *l = novo;
        return 1;
    }
    if(p == NULL){//Inserção no fim
        q->prox = novo;
        return 1;
    }
    //Inserção no meio
    q->prox = novo;
    novo->prox = p;
    return 1;

}

int main(){

    No *l=NULL;//Definição da estrutura 

    inserir_ordenado(&l, 42);
    inserir_ordenado(&l, 20);
    inserir_ordenado(&l, 5);

    inserir_ordenado(&l, 40);
    inserir_ordenado(&l, 50);
    inserir_ordenado(&l, 60);

    //remover_inicio(&l);

    /*if(remover_fim(&l)){//Remoção de elemento no final da lista.
        printf("Último elemento removido.\n");
    }else{
        printf("Não há elementos para remover\n");
    }*/

    mostrar_lista(&l);

    return 0;
}