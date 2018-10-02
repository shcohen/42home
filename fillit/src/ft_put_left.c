/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   ft_put_left.c                                      :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/09/26 14:12:02 by shcohen           #+#    #+#             */
/*   Updated: 2018/10/02 21:15:01 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "../include/fillit.h"

void ft_putleft(char *tetris)
{
  int i;
  int j;
  int pt5;
  int pt10;
  int pt15;

  i = 0;
  pt5 = 5;
  pt10 = 10;
  pt15 = 15;

  while (tetris[i] == '.' && tetris[i + pt5] == '.' && tetris[i + pt10] == '.' \
         && tetris[i + pt15] == '.')
          i++;
  j = 0;
  while (j < 20)
  {
    if (tetris[j] == '#' && i != 0)
    {
      tetris[j - i] = tetris[j];
      tetris[j] = '.';
    }
    j++;
  }
}