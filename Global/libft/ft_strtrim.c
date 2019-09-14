/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   ft_strtrim.c                                       :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <marvin@42.fr>                     +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/06/12 18:00:13 by shcohen           #+#    #+#             */
/*   Updated: 2018/06/12 19:28:39 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "libft.h"

char	*ft_strtrim(const char *str)
{
	unsigned int	start;
	size_t			end;

	start = 0;
	if (!str)
		return (NULL);
	end = ft_strlen(str) - 1;
	while (str && (str[start] == ' ' || str[start] == '\t'
				|| str[start] == '\n'))
		start++;
	while (str && (str[end] == ' ' || str[end] == '\t'
				|| str[end] == '\n') && end > start)
		end--;
	return (ft_strsub(str, start, (end - start + 1)));
}
