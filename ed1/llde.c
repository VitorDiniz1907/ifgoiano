#include <stdio.h>
#include <stdlib.h>

typedef struct no{
	int dado;
	struct no *prox, *ant;
}No;

int inserir_inicio_llde(No **l, int vlr){
	No *novo;
	novo = (No *)malloc(sizeof(No));
	if (novo == NULL)
		return 0;
	novo->dado = vlr;
	novo->prox = NULL;
	novo->ant = NULL;
	
	if (*l == NULL){
		*l = novo;
	}else{
		novo->prox = *l;
		(*l)->ant = novo;
		*l = novo;
	}	
}

int inserir_fim_llde(No **l, int vlr){
	No *novo;
	novo = (No *)malloc(sizeof(No));
	if (novo == NULL)
		return 0;
	novo->dado = vlr;
	novo->prox = NULL;
	novo->ant = NULL;
	
	if (*l == NULL){
		*l = novo;
	}else{
		No *p;
		for (p=*l; p->prox!=NULL; p=p->prox);
		p->prox = novo;
		novo->ant = p;
	}	
	return 1;
}


void mostrar_lista(No **l){
	if (*l == NULL)
		printf("Lista vazia.\n");
	No *p;
	for (p=*l; p!=NULL; p=p->prox){
		printf("%i\n", p->dado);
	}
}

int verificar_integridade(No **l){
	if (*l == NULL)
		return 1;
		
	No *p;
	int cont=0;
	for(p=*l; p->prox!=NULL; p=p->prox){
		cont++;
	}
	
	for ( ; p->ant!=NULL ; p=p->ant){
		cont--;
	}
	
	if (cont == 0)
		return 1;
	else
		return 0;
}

int main(){
	No *l=NULL;
	
	inserir_fim_llde(&l, 10);
	inserir_fim_llde(&l, 20);	
	inserir_fim_llde(&l, 30);	
	
	mostrar_lista(&l);
	
	if (verificar_integridade(&l))//Verifica se a lista está indo e voltando durante todo o percurso.
		printf("Lista integra.\n");
	else
		printf("Lista quebrada.\n");
	
}
