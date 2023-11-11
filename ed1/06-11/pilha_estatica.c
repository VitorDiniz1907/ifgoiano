#include <stdio.h>
#include <stdlib.h>
#include "pilha.h"
#define TAM 5

typedef struct pilha{
	int vet[TAM];
	int topo;
}Pilha;

Pilha * criarPilha(){
	Pilha *novo;
	novo=(Pilha*) malloc(sizeof(Pilha));
	if(novo==NULL)
	return NULL;
	novo->topo=0; //inicializando a pilha
	return novo; 
}

void verificar_nulo(Pilha *p){
	if (p== NULL){
		printf("A pilha não foi criada.\n");
		exit(0);
	}
}

int push(Pilha *p, int vlr){
	verificar_nulo(p);

	if (p->topo == TAM)
		return 0;
	p->vet[p->topo] = vlr;
	p->topo++;
	return 1;
}

int pop(Pilha *p){
	verificar_nulo(p);
	if (p->topo == 0)
		return 0;
	p->topo--;
	return 1;
}

int *top(Pilha *p){
	if (p->topo == 0)
		return NULL;
	return &p->vet[p->topo-1];
}


int vazia(Pilha *p){
	verificar_nulo(p);
	if(p->topo == 0){
		return 1;
	}
	return 0;
}

void liberarPilha(Pilha **p){
	verificar_nulo(*p);
	free(*p);
	*p = NULL;
}

void mostrarPilha(Pilha *p){
	verificar_nulo(p);
	if(p->topo==0)
	printf("Pilha vazia.\n");
	
	for(int i =p->topo-1; i>=0; i--){
		printf("%i\n", p->vet[i]);
	}
	 
}

