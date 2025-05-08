#include <stdio.h>
#include <math.h>

int main() {
    int num = 0;
    int isPrime = 1;

    printf("Digite um número: ");
    scanf("%d", &num);

    for (int i = 1; i <= sqrt(num); i++) {
        if (num % i == 0 && i != 1 && i != num) {
            isPrime = 1;
            break;
        }
    }

    if (isPrime == 1) printf("%d é um número primo\n", num);
    else printf("%d não é um número primo\n", num);
}