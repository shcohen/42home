/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   ft_put_up.c                                        :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/09/26 14:11:42 by shcohen           #+#    #+#             */
/*   Updated: 2018/10/02 21:14:59 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "../include/fillit.h"

void ft_putup(char *tetris) // VAR
{
  int i;
  int save;

  i = 0;
  while (tetris[i] != '#')
    i++;
  save = i;
  while (i < 20)
  {
    if (tetris[i] == '#')
    {
      tetris[i - ((save / 5) * 5)] = '#';
      if((save / 5) != 0)
        tetris[i] = '.';
    }
    i++;
  }
}