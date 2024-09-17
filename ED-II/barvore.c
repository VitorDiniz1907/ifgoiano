#include <stdio.h>
#include <stdlib.h>

#define GRAU 3
typedef struct no{
    int qtd_chave;
    int chave[GRAU];
    struct no *filho[GRAU+1];    
}No;

void pre_ordem(No **r){
    if(*r != NULL){
        int i;
        for(i = 0; i < (*r)->qtd_chave; i++){
            printf("%i ",(*r)->chave[i]);
        }
        printf("\n");
        for (i = 0; i < (*r)->qtd_chave+1; i++){
            pre_ordem(&(*r)->filho[i]);
        }
        
    }
}

No * criar_no(){
    No *novo = (No *)malloc(sizeof(No));
    if(novo == NULL){
        printf("Memória Insuficiente.\n");
        exit(0);
    }
    for(int i = 0; i<GRAU+1; i++){
        novo->filho[i] = NULL;
    }
}

void inserir_mais_um(No *r, int vlr){
    
}

void inserir (No **r, int vlr){
    if(*r == NULL){
        *r = criar_no();
        (*r)->chave[0] = vlr;
    }else{
        if((*r)->filho[0] == NULL){//Verifica Nó folha
            inserir_mais_um(r, vlr);
        }
    }
}