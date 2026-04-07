#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <stdint.h>
#include  <limits.h>

main()
{
    int a;
    short int b;
    unsigned int c;
    unsigned short int d;
    long int e;
    unsigned long int f;
    long long int g;
    unsigned long long int h;

    int *p_a;     // ponteiro de inteiro
    char caracter;
    char *p_caracter; // ponteiro de caracter
    char nome[50];
    char nomelongo[100];

    struct no_ls {
	int dado;
	struct no_ls *prox; };

    printf("Tamanho do unsigned short int     : %d bytes\n", sizeof(unsigned short int));
    printf("Tamanho do short int              : %d bytes\n", sizeof(short int));
    printf("Tamanho do int                    : %d bytes\n", sizeof(a));
    printf("Tamanho do unsigned int           : %d bytes\n", sizeof(unsigned int));
    printf("Tamanho do long int               : %d bytes\n", sizeof(long int));
    printf("Tamanho do unsigned long int      : %d bytes\n", sizeof(unsigned long int));
    printf("Tamanho do long long int          : %d bytes\n", sizeof(long long int));
    printf("Tamanho do unsigned long long int : %d bytes\n", sizeof(unsigned long long int));

    printf("\n");
    printf("Tamanho do PONTEIRO DE int        : %d bytes\n", sizeof(p_a));
    printf("Tamanho do char                   : %d bytes\n", sizeof(caracter));
    printf("Tamanho do PONTEIRO DE char       : %d bytes\n", sizeof(p_caracter));
	printf("Tamanho do no                     : %d bytes\n", sizeof(struct no_ls));

    /* limits.h */
    printf("\n\n");
    printf("Maximo SHORT INT              = %d\n", SHRT_MAX);
    printf("Maximo INT                    = %d\n", INT_MAX);
    printf("Maximo UNSIGNED INT           = %u\n", UINT_MAX);
    printf("Maximo LONG INT               = %ld\n", LONG_MAX);
    printf("Maximo UNSIGNET LONG INT      = %lu\n", ULONG_MAX);
    printf("Maximo LONG LONG INT          = %lld\n", LLONG_MAX);
    printf("Maximo UNSIGNED LONG LONG INT = %llu\n", ULLONG_MAX);

}
