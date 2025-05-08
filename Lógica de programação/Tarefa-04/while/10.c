#include <stdio.h>

int main() {
    double sum = 1;

    for (int i = 2; i <= 50; i++) {
        sum += (i * 2.0 - 1.0) / (double) i;
    }

    printf("Soma: %f\n", sum);
}