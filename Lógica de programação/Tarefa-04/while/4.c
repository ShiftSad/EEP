#include <stdio.h>

int main() {
    int pares = 0;
    int inpares = 0;

    for (int i = 0; i <= 10; i++) {
        int temp;
        printf("Coloque o número %d: ", i);
        scanf("%d", &temp);

        if (temp % 2 == 0) pares++;
        else inpares++;
    }

    printf("Quantidade de números pares: %d\n", pares);
    printf("Quantidade de números ímpares: %d\n", inpares);
}