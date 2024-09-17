#include <stdio.h>
#include <stdlib.h>

typedef enum{VERMELHO, PRETO}Cor;

typedef struct no{
	int dado;
	Cor cor;
	struct no *esq, *dir, *pai;
}No;

int qtd_elementos(No *r){
	if (r == NULL)
		return 0;
	return 1 + qtd_elementos(r->esq) + qtd_elementos(r->dir);
}

/*int remover_maior(No **r){
	if (*r == NULL)
		return 0;
	No *p, *q=NULL;
	for(p=*r; p->dir!=NULL; p=p->dir){
		q = p;
	}
	if (q == NULL){
		*r = (*r)->esq;
	}else{
		q->dir = p->esq;		
	}
	free(p);
	return 1;
}

int remover_maior_rec(No **r){
	if (*r == NULL)
		return 0;
	if ((*r)->dir == NULL){
		No *p;
		p = *r;
		*r = p->esq;
		free(p);
		return 1;
	}
	return remover_maior_rec(&(*r)->dir);
}*/


int * maior(No **r){
	if (*r == NULL)
		return NULL;
	No *p;
	for(p=*r; p->dir!=NULL; p=p->dir);
	return &p->dado;
}

int * maior_rec(No **r){
	if (*r == NULL)
		return NULL;
	if ((*r)->dir == NULL)
		return &(*r)->dado;
	return maior_rec(&(*r)->dir);
}

int qtd_chamadas =0;


/*/int remover_no_qualquer(No **r, int vlr){
	if (*r == NULL)
		return 0;
	if ((*r)->dado == vlr){
		if ((*r)->esq == NULL){ // Caso 1
			No *aux;
			aux = *r;
			*r = aux->dir;
			free(aux);
			return 1;
		}
		if ((*r)->dir == NULL){ // Caso 2
			No *aux;
			aux = *r;
			*r = aux->esq;
			free(aux);
			return 1;
		}
		// Caso 3
		(*r)->dado = *maior(&(*r)->esq);
		return remover_no_qualquer(&(*r)->esq, (*r)->dado);		
	}else{
		if (vlr > (*r)->dado){
				return remover_no_qualquer(&(*r)->dir, vlr);
		}else{
				return remover_no_qualquer(&(*r)->esq, vlr);
		}
	}
}

int buscar_elemento(No **r, int vlr){
	if (*r == NULL)
		return 0;
	if ((*r)->dado == vlr)
		return 1;
	if (vlr > (*r)->dado){
			return buscar_elemento(&(*r)->dir, vlr);
	}else{
			return buscar_elemento(&(*r)->esq, vlr);
	}
}*/

void rse(No **r){
	printf("RSE(%i)\n", (*r)->dado);
	int direcao = 0;
	if((*r)->pai != NULL){
		if((*r)->pai->dir == *r){
			direcao = 1;
		}
	}

	No *aux;
	aux = *r;
	*r = aux->dir;
	aux->dir = (*r)->esq;
	(*r)->esq = aux;

	(*r)->pai = aux->pai;
	aux->pai = *r;
	if(aux->dir != NULL){
		aux->dir->pai = aux;
	}

	if((*r)->pai != NULL){
		if(direcao){
			(*r)->pai->dir = *r;
		}
	}

}

void rsd(No **r){
	printf("RSD(%i)\n", (*r)->dado);
	No *aux;
	aux = *r;
	*r = aux->esq;
	aux->esq = (*r)->dir;
	(*r)->dir = aux;
}

void pre_ordem(No **r){
	if(*r != NULL){
		printf("%i ", (*r)->dado);
		if ((*r)-> cor ==VERMELHO){
		    printf("cor (vermelho) ");
		}else{
		    printf("cor (preto) ");
		}
		if ((*r)->pai ==NULL){
		   printf("pai (NULL)\n");
		}else{
		    printf("pai (%i)\n", (*r)->pai->dado);
		}
		pre_ordem(&(*r)->esq);
		pre_ordem(&(*r)->dir);
	}
}


void inserir(No **r, int dado){
	
	if (*r == NULL){
		No *novo;
		novo = (No *) malloc(sizeof(No));
		if (novo == NULL){
			printf("Espaço de memória insufiente.\n");
			exit(0);
		}
		novo->dado = dado;
		novo->esq = NULL;
		novo->dir = NULL;
		novo-> pai = NULL;
		novo->cor = VERMELHO;

		*r = novo;
	}else{
		if (dado > (*r)->dado){
			inserir(&(*r)->dir, dado);
			(*r)->dir->pai = *r;//Apontamento de que o pai do lado direito pe *R
		}else{
			inserir(&(*r)->esq, dado);
			(*r)->esq->pai = *r;
		}
	}
}

int main(){
	No *r=NULL;
	int *aux;
	
	inserir(&r, 10);
	inserir(&r, 20);
	inserir(&r, 15);
	inserir(&r, 30);
	
	pre_ordem(&r);

	rse(&r);

	pre_ordem(&r);
	
}