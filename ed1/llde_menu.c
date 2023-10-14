#include <stdio.h>
#include <stdlib.h>

typedef struct no
{
    int dado;
    struct no *prox, *ant;
} No;

int inserir_inicio_llde(No **l, int vlr){
    No *novo;
    novo = (No *)malloc(sizeof(No));
    if (novo == NULL)
        return 0;
    novo->dado = vlr;
    novo->prox = NULL;
    novo->ant = NULL;

    if (*l == NULL)
    {
        *l = novo;
    }
    else
    {
        novo->prox = *l;
        (*l)->ant = novo;
        *l = novo;
    }
}

int inserir_fim_llde(No **l, int vlr)
{
    No *novo;
    novo = (No *)malloc(sizeof(No));
    if (novo == NULL)
        return 0;
    novo->dado = vlr;
    novo->prox = NULL;
    novo->ant = NULL;

    if (*l == NULL)
    {
        *l = novo;
    }
    else
    {
        No *p;
        for (p = *l; p->prox != NULL; p = p->prox)
            ;
        p->prox = novo;
        novo->ant = p;
    }
    return 1;
}

int remover_inicio_llde(No **l){
    if (*l == NULL)
        return 0;
    No *p;
    p=*l;
    *l = p->prox;
    free(p);
    if (*l!=NULL){
        (*l)->ant=NULL;
    }
    return 1;
}

void mostrar_lista(No **l)
{
    if (*l == NULL)
        printf("Lista vazia.\n");
    No *p;
    for (p = *l; p != NULL; p = p->prox)
    {
        printf("%i\n", p->dado);
    }
}

int remover_fim_llde(No **l){
    if (*l == NULL){
        return 0;
    }

    No *p;

    for(p = *l; p->prox != NULL; p = p->prox);//Laço sem corpo para posicionar o p no último elemento da lista.

    if(p->ant == NULL){//Remoção em lista de um único elemento
        *l = NULL;
    }else{//Remoção do último valor em Lista com mais de um elemento
        p->ant->prox = NULL;
    }

    free(p);

    return 1;
}

int verificar_integridade(No **l)
{
    if (*l == NULL)
        return 1;

    No *p;
    int cont = 0;
    for (p = *l; p->prox != NULL; p = p->prox)
    {
        cont++;
    }

    for (; p->ant != NULL; p = p->ant)
    {
        cont--;
    }

    if (cont == 0)
        return 1;
    else
        return 0;
}

int menu(){
    int opc;

    system("clear");

    printf("[0] - Sair.\n");
    printf("[1] - Inserir no Inicio.\n");
    printf("[2] - Mostrar Lista.\n");
    printf("[3] - Verificar Integridade.\n");
    printf("[4] - Remover no Inicio.\n");
    printf("[5] - Inserir no final.\n");
    printf("[6] - Remover no final.\n");

    printf("\nEscolha uma opção: ");
    scanf("%i", &opc);
    return opc;
}

int main()
{
    No *l = NULL;
    int opcao, vlr;

    while(opcao = menu()){
        switch (opcao){
        case 1:
            printf("Valor: ");
            scanf("%i", &vlr);
            if (inserir_inicio_llde(&l, vlr))
                printf("%i inserido.\n", vlr);
            else 
                printf("não foi possivel inserir %i.\n", vlr);
            break;
        case 2:
            mostrar_lista(&l);
            break;
        case 3:
            if (verificar_integridade(&l))
                printf("Lista integra.\n");
            else
                printf("Lista quebrada.\n");
            break;

        case 6:
            if(remover_fim_llde(&l)){
                printf("Item removido da Lista.\n");
            }else{
                printf("Erro ao remover item da Lista.\n");
            }
            break;
        default:
            printf("Opção Invalida.\n");
        }
        getchar();
        getchar();
    }

    return 0;
}