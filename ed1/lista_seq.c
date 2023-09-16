#include <stdio.h>
#include <stdlib.h>

#define TAM 5

typedef struct lista{
    int vet[TAM];
    int qtd;
}Lista;

void protecao(Lista *l){
    if(l == NULL){
        printf("A Lista não foi criada.\n");
        exit(0);
    }
}

Lista * criar_lista(){
    Lista *novo;
    novo = (Lista *) malloc(sizeof(Lista)); //Cria o espaço de memória para a lista
    novo->qtd = 0; //Inicialização da Lista
    
    return novo;
}

void mostrar_lista(Lista *l){
    protecao(l);
    for(int i=0; i< l->qtd; i++){
        printf("%i\n", l->vet[i]);
    }
}

void deslocar_para_direita(Lista *l){
    for(int i=l->qtd; i > 0; i--){
        l->vet[i] = l->vet[i-1];
    }
    
}

void deslocar_para_esquerda(Lista *l){
    for(int i=0; i < l->qtd-1; i++){
        l->vet[i] = l->vet[i+1];
    }
}

int remover_inicio(Lista *l){
    protecao(l);
    if(l->qtd == 0){
        return 0;
    }

    deslocar_para_esquerda(l);
    l->qtd--;
    return 1;
}

int remover_final(Lista *l){
    protecao(l);
    if(l->qtd == 0){
        return 0;
    }
    l->qtd--;
    return 1;
}

int inserir_inicio(Lista *l, int valor){
    protecao(l);
    if(l->qtd == TAM){
        return 0;
    }
    //Deslocar os elementos para direita
    deslocar_para_direita(l);
    l->vet[0] = valor;
    l->qtd++;
    return 1;
}

int inserir_final(Lista *l, int valor){
    protecao(l);
    if(l->qtd == TAM){
        return 0;
    }
    l->vet[l->qtd] = valor;
    l->qtd++;

    return 1;
}


int menu(){
    int opc;
    system("clear");
    printf("[0] Sair\n");
    printf("[1] Criar Lista\n");
    printf("[2] Inserir no Início\n");
    printf("[3] Mostrar Lista\n");
    printf("[4] inserir no final\n");
    printf("[5] Remover no início\n");
    printf("[6] Remover no final\n");
    printf("[7] Remover Lista\n");
    printf("[8] Limpar Lista\n");

    printf("Escolha uma Opção: ");
    scanf("%i", &opc);
 
    return opc;
}

void remover_lista(Lista **l){
    free(*l);
    *l=NULL;
}

void limpar_lista(Lista *l){
    l->qtd = 0;
}

int main(){
    Lista *l;
    int opc, valor;

    while(opc = menu()){
        switch(opc){
            case 1:
                if(l){
                    l = criar_lista();
                    printf("Lista Criada.\n");
                }else{
                    printf("A Lista já está Criada.\n");
                }
            case 2:
                printf("valor: ");
                scanf("%i", &valor);
                if(inserir_inicio(l, valor)){
                    printf("%i inserido\n", valor);
                }else{
                    printf("Lista Cheia. %i não inserido\n", valor);
                }
                break;
            case 3:
                mostrar_lista(l);
                break;
            case 4:
                printf("valor: ");
                scanf("%i", &valor);
                if(inserir_final(l, valor)){
                    printf("%i inserido\n", valor);
                }else{
                    printf("Lista Cheia ou Inexistente. %i não inserido\n", valor);
                }
                break;
            case 5:
                if(remover_inicio(l)){
                    printf("Elemento Removido\n");
                }else{
                    printf("Lista Vazia");
                }
                break;
            case 6:
                if(remover_final(l)){
                    printf("Elemento Removido\n");
                }else{
                    printf("Lista Vazia");
                }
                break;
            case 7:
                remover_lista(&l);
                printf("Lista removida com Sucesso!\n");
                break;
            case 8:
                limpar_lista(l);
                printf("Lista removida com Sucesso!\n");
                break;
            default:
                printf("Opção Inválida");
        }
        getchar();
        getchar();
    }

    return 0;
}