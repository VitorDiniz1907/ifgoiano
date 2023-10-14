#include <stdio.h>
#include <stdlib.h>

typedef struct no{
    int dado;
    struct no *prox, *ant;
}No;

typedef struct desc{
    No *ini, *fim, *maior;
    int qtd;
}Desc;

void mostrar_lista(Desc *d){
    if(d->qtd == 0){
        printf("Lista Vazia :(\n");
    }else{
        printf("Quantidade: %i\n", d->qtd);
        printf("Maior: %i\n", d->maior->dado);
        printf("Lista de elementos:\n");
        No *p;
        for(p = d->ini; p != NULL; p = p->prox){
            printf("%i\n", p->dado);
        }
    }
}

int inserir_inicio_llde_desc(Desc *d, int vlr){
    No *novo;
    novo = (No *)malloc(sizeof(No));
    if (novo == NULL){
        return 0;
    }
    novo->dado = vlr;
    novo->prox = NULL;
    novo->ant = NULL;

    if (d-> qtd == 0){
        d->ini = novo;
        d->fim = novo;
        d->maior = novo;
    }else{
        novo->prox = d->ini;  
        d->ini->ant = novo;
        d->ini = novo;
        if(vlr >d->maior->dado){
            d->maior = novo;
        }
    }
    d->qtd++;

    return 1;
}

int remover_fim_llde_desc(Desc *d){
    if(d->qtd == 0){
        return 0;
    }else if(d->qtd == 1){
        free(d->ini);
        d->ini = NULL;
        d->fim = NULL;
        d->maior = NULL;
    }else{
        No *p;
        p = d->fim;
        d->fim = p->ant;
        d->fim->prox = NULL;
        d->qtd--;
        if(p->dado == d->maior->dado){//Atualizar o campo de maior no descritor
            No *i;
            for(i = d->ini, d->maior = d->ini;i != NULL; i = i->prox){
                if(i->dado > d->maior->dado){
                    d->maior = i;
                }
            }
        }
        free(p);
        
    }

    return 1;




}




int main(){
    Desc d;

    d.ini = NULL;
    d.fim = NULL;
    d.maior = NULL;
    d.qtd = 0;

    inserir_inicio_llde_desc(&d, 10);
    inserir_inicio_llde_desc(&d, 20);
    inserir_inicio_llde_desc(&d, 30);

    mostrar_lista(&d);

    remover_fim_llde_desc(&d);

    printf("Elemento Removido.\n");
    mostrar_lista(&d);

    return 0;
}