/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   ft_first_check.c                                   :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/09/20 21:12:43 by shcohen           #+#    #+#             */
/*   Updated: 2018/09/26 21:09:42 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "../include/fillit.h"

void	ft_first_check(char *tetris)
{
	int	i;
	int	point;
	int	htag;
	int	endline;

	i = 0;
	point = 0;
	htag = 0;
	endline = 0;
	while (tetris[i])
	{
		if (tetris[i] != '.' && tetris[i] != '#'
				&& tetris[i] != '\n')
		{
			ft_putstr("error.\n");
			exit(0);
		}
		if (tetris[i] == '.')
			point++;
		if (tetris[i] == '#')
			htag++;
		if (tetris[i] == '\n')
			endline++;
		i++;
	}
	if (point != 12 || htag != 4 || endline != 4)
	{
		ft_putstr("error.\n");
		exit(0);
	}
}