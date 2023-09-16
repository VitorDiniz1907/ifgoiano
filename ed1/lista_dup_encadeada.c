#include <stdio.h>
#include <stdlib.h>

typedef struct no{
    int dado;
    struct no *prox;//Ponteiro do tipo struct no (Definição do tipo de dado)
    struct no *ant;
}No;


void inserir_inicio_llde(No **l, int vlr){
    No *novo;
    novo = (No *)malloc(sizeof(No));
    if(novo = NULL){
        return 0;
    }
    novo->dado = vlr;
    novo->prox = NULL;
    novo->ant = NULL;

    if(*l == NULL){
        *l = novo;
    }else{
        novo->prox = *l;
        (*l)->ant = novo;
        *l = novo;
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

int verificar_integridade(No **l){
    if(*l == NULL){
        return 1;
    }

    No *p;
    int cont=0;
    for(p =*l; p->prox != NULL; p = p->prox){
        cont++;
    }
    for(; p->ant != NULL; p = p->ant){
        cont--;
    }

    if(cont == 0){
        return 1;
    }else{
        return 0;
    }
}

int main(){
    No *l = NULL;

    inserir_inicio_llde(&l, 10);
    inserir_inicio_llde(&l, 20);
    inserir_inicio_llde(&l, 30);
    inserir_inicio_llde(&l, 40);

    mostrar_lista(&l);

    if(verificar_integridade(&l)){
        printf("Lista Integra.\n");
    }else{
        printf("Lista Quebrada.\n");
    }

}