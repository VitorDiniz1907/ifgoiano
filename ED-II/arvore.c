#include <stdio.h>
#include <stdlib.h>

typedef struct no{
	int dado;
	struct no *esq, *dir;
}No;

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

		*r = novo;
	}else{
		if (dado > (*r)->dado){
			inserir(&(*r)->dir, dado);
		}else{
			inserir(&(*r)->esq, dado);
		}	
	}
}

void pre_ordem(No **r){
	if(*r != NULL){
		printf("%i\n", (*r)->dado);
		pre_ordem(&(*r)->esq);
		pre_ordem(&(*r)->dir);
	}
}

int qtd_elementos(No *r){
	if (r == NULL)
		return 0;
	return 1 + qtd_elementos(r->esq) + qtd_elementos(r->dir);
}

int remover_maior(No **r){
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
}


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

No *copiar_arvore(No **r){
    if(*r == NULL){
        return NULL;
    }
    No *ret = malloc(sizeof(No));
    ret->dado = (*r)->dado;
    ret->esq = copiar_arvore(&(*r)->esq);
    ret->dir = copiar_arvore(&(*r)->dir);
    return ret;
}

void *copiar_arvore(No **r, No **r2){
    
}


int main(){
	No *r = NULL;
	No *aux = NULL;
	
    inserir(&r, 10);
    inserir(&r, 5);
    inserir(&r, 8);
    inserir(&r, 15);
    inserir(&r, 13);
    inserir(&r, 20);

    aux = copiar_arvore(&r);
    printf("Arvore 1.\n");
    pre_ordem(&r);

    printf("Arvore 2.\n");
    pre_ordem(&aux);
    


}