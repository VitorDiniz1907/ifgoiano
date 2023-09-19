#include <stdio.h>
#include <stdlib.h>

typedef struct no{ //Tipo de dado para Nó
    int dado;
    struct no *prox;
}No;

typedef struct desc{//Tipo de dado do tipo Descritor
    No *ini, *fim;
}Desc;

int inserir_inicio_llse_desc(Desc *d, int vlr){
    No *novo;
    novo = (No *)malloc(sizeof(No));
    if(novo == NULL){
        return 0;
    }
    novo->dado = vlr;
    novo->prox = NULL;

    if(d->ini == NULL){//Verifica se d->ini é lista vazia(não contém elementos)
        d->ini = novo;
        d->fim = novo;
    }else{
        novo->prox = d->ini;
        d->ini = novo;
    }
    return 1;
}

int inserir_fim_llse_desc(Desc *d, int vlr){
    No *novo;
    novo = (No *)malloc(sizeof(No));
    if(novo == NULL){
        return 0;
    }
    novo->dado = vlr;
    novo->prox = NULL;

    if(d->ini == NULL){//Verifica se d->ini é lista vazia(não contém elementos)
        d->ini = novo;
        d->fim = novo;
    }else{
        d->fim->prox = novo;
        d->fim = novo;
    }
    return 1;
}


void mostrar_lista(No **l){
    if(*l == NULL){
        printf("Lista Vazia!\n");
    }
    No *p;
    for(p = *l; p != NULL; p = p->prox){
        printf("%i\n", p->dado);
    }
}

int main(){
    Desc d;//Declaração de d como tipo de dado Descritor
    d.ini = NULL; //Inicialização do descritor
    d.fim = NULL;

    inserir_inicio_llse_desc(&d, 10);
    inserir_inicio_llse_desc(&d, 20);
    inserir_fim_llse_desc(&d, 30);
    inserir_fim_llse_desc(&d, 90);

    mostrar_lista(&d.ini);


    return 0;
}